const express = require('express');
const erroMessages = express()

erroMessages.use((req, res, next) => {
    const error = new Error('Not found');
    error.status = 404;
    next(error);
})

erroMessages.use((error, req, res, next) => {
    res.status(error.status || 500);
    res.json({
        error: {
            message: error.message,
            code:"404.4.10"
        }
    });
});

module.exports = erroMessages;