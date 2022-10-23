# Coccoc Test Assignment

## How to run

1. Clone the project 
2. Copy `.env.exmaple` to `.env`
3. Go to: `{url}/api/shipping/calculate-gross-price` to calculate gross price with `POST` method and params:

   | Name   | Required | Description             |
   |:-----|:------------------------|:------|
   | items (*) | true | Array of item want to calculate |

   (*):

   | Name   | Required | Description       |
   |:-----|:------------------|:------|
   | amazon_price | true | Amazon price      |
   | width | true | Width of product  |
   | height | true | Height of product |
   | depth | true | Depth of product  |
   | weight | true | Weight of product |

4. Run test: `php artisan test`

### Note:
- All `product_type` updates will be updated in the file `FeeByProductType`
- If there is any update like `product_type` will just do the work:
    + Add param to the passed `options` variable
    + Add handle code to function `getClassShippingFree` in `ShippingService`
    + Create a new class to handle new update


