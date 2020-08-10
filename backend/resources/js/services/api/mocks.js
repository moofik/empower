function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;

    while (0 !== currentIndex) {
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}

function randomInteger(min, max) {
    let rand = min - 0.5 + Math.random() * (max - min + 1);
    return Math.round(rand);
}

export const MAP_KEYS = {
    WORKSHOP: 'workshop_',
    POST: 'post_'
};

const WORK_MODES = {
    TEMP: 'temp',
    LOCAL_STORAGE: 'storage'
};

const mockMap = new Map();

window.storageMode = WORK_MODES.LOCAL_STORAGE;

export function activateTempStorage() {
    window.storageMode = WORK_MODES.TEMP;
    console.log('storage mode changed');
}

export function fetchMockByKey(key) {
    if (window.storageMode === WORK_MODES.LOCAL_STORAGE) {
        return JSON.parse(window.localStorage.getItem(key));
    }

    return mockMap.get(key);
}

export function fetchMocksByPrefix(prefix) {
    const arr = [];
    const prefixLen = prefix.length;

    if (storageMode === WORK_MODES.LOCAL_STORAGE) {
        console.warn('Fetch mocks from localStorage by prefix ' + prefix);
        for (let i = 0; i < localStorage.length; i++) {
            if (localStorage.key(i).substring(0, prefixLen) === prefix) {
                arr.push(JSON.parse(localStorage.getItem(localStorage.key(i))));
            }
        }
    } else {
        const keysIter = mockMap.keys();
        console.warn('Fetch mocks from in-memory storage by prefix ' + prefix);
        for (let key of keysIter) {
            if (key.substring(0, prefixLen) === prefix) {
                arr.push(mockMap.get(key));
            }
        }
    }

    return arr;
}

export function createBlogArticleMock(
    title = 'Random article title',
    preview = null,
    content = '',
    description = '',
    slug = 'slug_' + randomInteger(0, 1000000),
    published_at = '07/28/2018'
) {
    const id = createBlogArticleMock.id++;
    const long_published_at = published_at + ' at ' + '08:15';
    const mock = {id, title, preview, description, content, published_at, long_published_at, slug};

    if (window.storageMode === WORK_MODES.LOCAL_STORAGE) {
        window.localStorage.setItem(MAP_KEYS.POST + id, JSON.stringify(mock));
    } else {
        mockMap.set(MAP_KEYS.POST + slug, mock);
    }

    return mock;
}
createBlogArticleMock.id = 0;

export function createWorkshop(
    title = 'Random article title',
    rating = 5,
    location = 'Helsinki',
    specialization = [],
    link = '#',
) {
    const id = createWorkshop.id++;
    const workshop = {
        title,
        rating,
        location,
        specialization,
        id,
        link,
        information: "Lorem ipsum dolor sit profession, sea debet graece at. No tax aliquip consequuntur pro that adhuc paul nullam vel. Case soluta est ea, in nominavi gubergren voluptatibus per, to Altera electram principes sed. Modo integre sadipscing Nam et.",
        contacts: {
            name: 'Random Company Name ' + randomInteger(),
            zip_code: "230023",
            business_id: "23423-3fer4e-323rd",
            city: location,
            address: "Random Street, 6, 15",
            phone: "+1-234-567-89-00",
            employee: randomInteger(5, 25),
            founded: randomInteger(1950, 2019)
        },
        services: {
            main: ['Exhausts & mufflers', 'Brake Renovations', 'Tires & Wheels', 'Battery', 'Ball joints & shafts'],
            additional: ['Towing service', 'Coffee', 'Yearly inspection', 'Bicycle for loan', 'Wi-Fi for customers', 'Pickup service', 'Service in English', 'Service in Swedish', 'Service in Russian', 'Wheel storage', 'Replacement car', 'Insurance company approved repairshop']
        },
        makes: [
            {make: 'Audi', from: 1980, to: 2019},
            {make: 'BMW', from: 1985, to: 2019},
            {make: 'Buick', from: 1988, to: 2019}
        ],
        payment: ['Cash', 'Fall', 'Debit card', 'Financing or partial payment', 'American Express', 'Dinners club', 'Mastercard', 'Visa'],
        schedule: [
            {day: 'Monday', from: '9.00 a.m.', to: '10.00 p.m.'},
            {day: 'Wednesday', from: '9.00 a.m.', to: '10.00 p.m.'},
            {day: 'Saturday', from: '9.00 a.m.', to: '10.00 p.m.'},
        ],
        parts: ['Original parts', 'Same as the originals', 'Spare parts', 'Used parts', 'Customer purchased parts'],
        warranty: {
            job: {
                month: 12,
                drive: 10000
            },
            assemblies: {
                month: 6,
                drive: 5000
            },
        },
    };

    if (window.storageMode === WORK_MODES.LOCAL_STORAGE) {
        window.localStorage.setItem(MAP_KEYS.WORKSHOP + id, JSON.stringify(workshop));
    } else {
        mockMap.set(MAP_KEYS.WORKSHOP + id, workshop);
    }

    return workshop;
}
createWorkshop.id = 0;

export function createQuote() {
    return {
        created_at: '04/09/18, 8:54 p.m.',
        make: '<b>Mercedes</b><br/> E-Class (W212, S212)',
        schedule: '1 day',
        category: 'Oil change',
        views: 4,
        bidding: 0,
        button: 'read more',
        note: 'Login to offer',
        nested: {
            active: false,
            headers: ['City', 'Driven', 'Registration number', '', '', '', 'Description', ''],
            body: ['Vantaa', '180000', 'BSN-519', '', '', '', '-', '']
        }
    }
}

export const BLOG_CONTENT = {
    GM_POST: 'GM loses another legal battle over dealer scoring\n' +
        'General Motors may have to reconsider the way it measures and enforces dealership sales effectiveness in the nation\'s largest vehicle market after a ruling that the company\'s system violates a state law.\n' +
        '\n' +
        'California\'s New Motor Vehicle Board ruled Aug. 13 against GM\'s use of a benchmark called the retail sales index as grounds to terminate the franchise agreement of Folsom Chevrolet, a Sacramento-area dealership owned by Marshal Crossan.\n' +
        '\n' +
        'The decision capped a long-running battle between Folsom and GM, which had concluded that Folsom failed to meet sales expectations and sought to revoke its franchise in late 2016.\n' +
        '\n' +
        'Attorneys representing Folsom Chevrolet argued that GM\'s reliance on RSI was a violation because it failed to account for various market conditions, including brand preference, geography and demographics.\n' +
        '\n' +
        'The decision follows a similar case in New York, where the state\'s highest court ruled in 2016, on similar grounds, that GM violated state law by trying to cancel a Chevy dealer\'s franchise for subpar RSI.',
    HYNDAI: 'PARK CITY, Utah - The Redesigned 2019 Hyundai Santa Fe gets several changes - starting with the name.\n' +
        '\n' +
        'Hyundai is dropping Sport from the name of a smaller five-passenger version of the Santa Fe.\n' +
        '\n' +
        'The brand will have one more year of selling down the three-row Santa Fe, under the name Santa Fe XL, and then will replace it with a new nameplate. \n' +
        '\n' +
        'That nameplate, expected to be called Palisade, is to debut in 2019.\n' +
        '\n' +
        '"When we launched the previous generation, the idea was to maximize the efficiency of our marketing," said Mike O\'Brien, Hyundai Motor America\'s vice president of product, corporate and digital planning, during a media introduction here. "We had Veracruz, we had Santa Fe and we never spent enough money on all of our kids. One kid got a college education. The other only got a high school education.',
    FERRARI: 'RM Sotheby\'s shattered the record for most valuable car to sell at auction Saturday night with the highly anticipated sale of a 1962 Ferrari 250 GTO for $48.4 million dollars. RM opened bidding on the car at $35 million and within a minute bidding had moved up in million-dollar increments to $38 million. From there, call-in phone bidders duked it out in ever smaller increments until the hammer finally fell several tense minutes later at $44,000,000. After buyer\'s commission is added, the final sale price was $48,400,000.\n' +
        '\n' +
        'The 250 GTO that sold is one of fewer than 40 cars built and is widely considered to be the most desirable Ferrari model ever due to the story of its creation, its success on track in period, and its legacy as the last Ferrari race car that was equally at home being driven on the track as it was on the street. Because 250 GTOs were built to race, many were heavily crashed or received replacement powertrains. While this car, originally a more desirable Series 1 example, did receive new Series 2 bodywork in period, the work was commissioned by the factory and the car went on to win the Targa Florio with its new sheetmetal. The car miraculously still retains its original engine and gearbox after all its years of racing, which undoubtedly helped the car\'s value when it crossed the block.\n' +
        '\n' +
        'The previous automotive auction record was also set by a Ferrari 250 GTO, which brought just over $38 million at Bonhams\' 2014 Quail Lodge sale. Because 250 GTOs rarely come up for sale with so few built, they tend to attract worldwide attention when they do, as well as serving as a sort of barometer for the health of the classic car market.'
};

export const BLOG_DESCRIPTION = {
    GM_POST: 'General Motors may have to reconsider the way it measures and enforces dealership sales effectiveness in the nation\'s largest vehicle market after ruling that company system violates state law.',
    HYNDAI: 'That nameplate, expected to be called Palisade, is to debut in 2019.',
    FERRARI: ''
};
