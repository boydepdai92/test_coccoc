# Coccoc Test Assignment

## How to run

1. Clone the project
2. Copy `.env.exmaple` to `.env`
3. Go to: `{url}/api/shipping/calculate-gross-price` to try get gross price
4. Run test: `php artisan test`

**Note:**
- All `product_type` updates will be updated in the file `FeeByProductType`
- If there is any update like `product_type` will just do the work:
    + Add param to the passed `options` variable
    + Add handle code to function `getClassShippingFree` in `ShippingService`
    + Create a new class to handle new update


