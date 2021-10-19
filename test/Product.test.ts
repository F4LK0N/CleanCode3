import Product from "../src/Product";
import Body from "../src/Body";

test("Product - Sanitize Inputs", function () {
    const product = new Product(1, 1, "Name", -1);
    expect(product.price).toBe(1);
});

test("Product - Create", function () {
    const product = new Product(1, 1, "Name", 1000);
    expect(product).toBeDefined();
});

test("Product - Volume", function () {
    const product = new Product(1, 1, "Name", 1000, new Body(10, 12, 20));
    expect(product.body.volume).toBe(2400);
});
