# Client Communication

## What is the current state of the MVP? Is it usable? Is it bug free? If not, how much more time do you need for Phase 1?
All requirements for Phase 1 of the MVP have been satisfied. Given limited time constraints and the relatively small size of the MVP, the application was largely tested manually (as opposed to with automated tests). The tests did not turn up any bugs, and I was able to validate that all requirements for Phase 1 functioned as intended. Given that the application will continue to grow, it would be beneficial to dedicate time to writing automated tests covering the Phase 1 requirements. This should take between one and two hours to complete.

## How do we maintain a full and accurate history of orders given changing products, discounts, and users?
Currently, the application represents an order as a relationship between a user and a product (acting as a pivot table). As the order does not archive the product's current state when the order is placed, this design relies on products not being modified to preserve an accurate order history. Further, given that Phase 1 requirements dictate that an order consists of a maximum of one product, the order does not currently record a total for the order but instead queries the product price.

As we continue to develop the application and add functionality to modify products, order multiple products in one order, and apply discounts, we will need to refactor the order model to maintain an accurate history. The order will need to record information about its products as they exist when the order is placed, which can be accomplished via a product version control system. Further, the order would need to record financial information such as the order total, applied discounts, applicable taxes, etc. This can be accomplished by associating an order with an invoice model to track each financial datum as a line item.

## A "shopping cart", where users can view their selections before purchasing, was not included as part of phase 1 requirements. Do you feel it should be part of the MVP, or did you include it? Why or why not?
Although not part of the Phase 1 MVP requirements, I elected to add shopping cart functionality to the application. I did so for two reasons: 

1. Virtually all online ordering systems implement shopping cart functionality in one form or another. As such, customers are more than likely to expect similar functionality when ordering via this application. Further, a shopping cart is likely to prevent accidental orders from being placed, which would otherwise result in unhappy or frustrated customers.
2. Although Phase 1 of the MVP dictates that only one product can be ordered at a time, if the limit were to be increased later, it would not require significant changes to the customer-facing UI.

## Please deliver an estimate for phase 2. How many hours would it take? On what date can you deliver?
Phase 2 of the MVP will take between 10 and 15 hours to complete and can be delivered by February 21st, 2023. This estimate is broken down as follows:

| Requested Feature                                                                             | Estimate  |
|-----------------------------------------------------------------------------------------------|-----------|
| The creation of admin users, which can see lists of products and users.                       | 0-1 hours |
| The ability for admins to create, edit, and delete products.                                  | 4-6 hours |
| The ability for admins to create, edit, and delete users.                                     | 1-2 hours |
| The ability for admins to see all orders, and the total amount each customer has spent.       | 1-2 hours |
| The ability for orders to have discounts. Customers are trusted to give themselves discounts. | 1-2 hours |
| The ability for admins to edit the discount after the order has been created.                 | 0-1 hours |
| The ability to cancel orders.                                                                 | 0-1 hours |

The above estimates are based on the following assumptions:

- A version control system will need to be implemented to ensure that an accurate order history can be preserved as administrators edit and delete products. The following package looks to be a suitable solution for implementing this functionality: https://github.com/mpociot/versionable.
- Discounts are specified as an absolute dollar value or a percentage of the order total. Only one discount can be applied per order. Discount codes and other similar features will not be implemented.

## In Phase 3, the client would like to allow customers to pay within the application. Do you have any recommendations for the client?
Assuming that the client is selling physical products, a payment gateway service such as Stripe can be implemented quickly in a Laravel application. If the client is selling digital products, they may also consider a merchant of record service such as Paddle, which can be implemented with a similar speed to Stripe, but provides additional features around tax collection and remittance that Stripe does not.
