import OrderItem from "../src/OrderItem";
import Product from "../src/Product";

test("OrderItem - Sanitize Inputs", function () {
    const product = new Product(1, 1, "Name", 1000);
    const orderItem = new OrderItem(1, -1, product);
    expect(orderItem.quantity).toBe(1);
});

test("OrderItem - Create", function () {
    const product = new Product(1, 1, "Name", 1500);
    const orderItem = new OrderItem(1, 2, product);
    expect(orderItem.price).toBe(3000);
    expect(orderItem.volume).toBe(2);
    expect(orderItem.density).toBe(2);
});
