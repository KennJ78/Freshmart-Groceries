const axios = require('axios')

const newSale = async(req, res) =>{
    const {items, total_sale} = req.body

    try{
        for(const item of items){
            const inv_res = await axios.patch(`${process.env.INVENTORY_SERVICE}/edit/${item.product}`, {sold:item.num_sold})
            
            if(!inv_res.data.success){
                res.status(500).json({success: false, message: inv_res.data.message})
            }
        }

        const pos_response = await axios.post(`${process.env.POS_SERVICE}/add`, {items, total_sale})

        res.status(201).json({success: true, message: pos_response.data})
    }catch(error){
        res.status(500).json({success: false, message: error.message})
    }
}


module.exports = {
    newSale,
}