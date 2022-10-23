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
- I have 2 ways to make shipping fee flexible
- With method 1, you need to do the following steps to change when needed:
  - All `product_type` updates will be updated in the file `FeeByProductType`
  - If there is any update like `product_type` will just do the work:
      + Add param to the passed `options` variable
      + Add handle code to function `getClassShippingFree` in `ShippingService`
      + Create a new class to handle new update
- With method 2, you need to do the following steps to change when needed:
  - All `product_type` updates will be updated in the file `FeeByProductType`
  - If there is any update like `product_type` will just do the work:
    + Add param to the passed `options` variable
    + Add function to `ShippingFeeBuilder` to add shipping fee
    + Add new property to `ShippingFee` class
- For me personally, I prefer method 1 over method 2
- Code for method 2 is in branch `feature_builder`

### Fun fact:
- If I can't get a chance to talk to you further (in case I fail). Please show me how you do better, I always want to learn more. Thank you very much


