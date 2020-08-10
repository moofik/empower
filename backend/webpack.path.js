const path = require('path');

module.exports = {
    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
            '@': path.resolve(__dirname,'./resources/js'),
            '~': path.resolve(__dirname,'./resources')
        }
    }
};
