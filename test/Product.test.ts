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

test("Product - Body", function () {
    const body = new Body(10, 12, 20, 1000);
    const product = new Product(1, 1, "Name", 1000, body);
    expect(product.body.volume).toBe(2400);
    expect(product.body.density).toBe(0.42);
});
