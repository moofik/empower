#!/usr/bin/env sh

# Задаем переменные
export BRANCH=${BRANCH:-"master"}
export APP_HOSTNAME=${APP_HOSTNAME:-"bautomate.org"}
export COMPOSE_INTERACTIVE_NO_CLI=1
export ENVIRONMENT="prod"

RESET=""
FONT_BOLD=""
COLOR_COMMAND=""
COLOR_INFO=""

color_info() {
  echo -e ${COLOR_INFO}${FONT_BOLD}$1${RESET}
}

color_command() {
  echo -e ${COLOR_COMMAND}$1${RESET}
}

color_exec() {
  color_command "$*"
  eval $* || exit 127
}

color_exec_ignore() {
  color_command "$*"
  eval $*
}

# Функция обновления кода из гита
update_git() {
  color_exec "git fetch origin ${BRANCH}"
  color_exec "git checkout -f"
  color_exec "git checkout ${BRANCH}"
  color_exec "git reset --hard origin/${BRANCH}"
  color_exec "git pull"
}

# Функция для запуска после деплоя
after_deploy() {
  color_info "Назначаем права доступа для директорий..."
  color_exec "docker exec \
    brainpower-php-fpm chmod -R 777 /brainpower/backend/bootstrap"
  color_exec "docker exec \
    brainpower-php-fpm chmod -R 777 /brainpower/backend/storage"

  color_info "Генерим секретный ключ приложения..."
  color_exec "./docker/artisan key:generate"
}

# Функция для запуска перед деплоем новых контейнеров
before_deploy() {
  color_info "Билдим контейнеры..."
  color_exec "docker-compose -f ./docker/docker-compose.yml build"

  color_info "Устанавливаем зависимости..."
  color_exec "./docker/composer install"
  color_exec "MOUNT_DIR=backend ./docker/yarn install"

  color_info "Накатываем миграции..."
  color_exec "./docker/artisan migrate"
}

before_first_deploy() {
  color_info "Билдим контейнеры..."
  color_exec "cp ./docker/docker-compose.yml.dist ./docker/docker-compose.yml && docker-compose -f ./docker/docker-compose.yml build"
  
  color_info "Устанавливаем зависимости..."
  color_exec "./docker/composer install"
  color_exec "MOUNT_DIR=backend ./docker/yarn install"

  color_info "Накатываем миграции..."
  color_exec "./docker/artisan migrate"
}

# Функция для первого деплоя
first_deploy() {
  color_info "Переключаемся на нужную ветку..."
  update_git
  before_first_deploy
  color_info "Установка проекта..."
  ./docker/script/install.sh
  color_info "Запускаем контейнеры..."
  ./docker/up
  after_deploy
}

# Директория проекта
PROJECT_DIR="/home/alfi"

if [ ! -d "${PROJECT_DIR}/.git" ]; then
  color_info "Проект еще не разворачивался, разворачиваю..."
  color_exec "mkdir ${PROJECT_DIR}"
  color_exec "cd ${PROJECT_DIR}"
  color_exec "git clone git@gitlab.com:moofik12/alfi.git ."
  first_deploy
else
  color_exec "cd ${PROJECT_DIR}"
  color_info "Апдейт текущей ветки ${BRANCH}..."
  update_git
  # Миграции БД и скачивание лангов до запуска новых контейнеров
  before_deploy
  color_info "Запускаем контейнеры..."
  ./docker/up
  # После запуска новых контейнеров
  after_deploy
fi

color_info "Выполнен деплой ветки ${BRANCH}"
color_info "Проект доступен по адресу https://${APP_HOSTNAME}"
