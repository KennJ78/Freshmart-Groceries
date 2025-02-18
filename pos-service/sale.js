const mongoose = require('mongoose')
const product = require('../inventory-service/product')

const Schema = mongoose.Schema

const saleSchema = new Schema({
    items: {
        type: [
            {
                product: {
                    type: Schema.Types.ObjectId,
                    required: true,
                    ref: 'Product'
                },
                num_sold: {
                    type: Number,
                    required: true,
                },
                sale: {
                    type: Number,
                    required: true
                }
            }
        ],
        required: true
    },
    total_sale: {
        type: Number,
        required: true
    }
}, {timestamps: true})

module.exports = mongoose.model('Sale',saleSchema)