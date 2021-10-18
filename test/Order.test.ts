import Coupon from "../src/Coupon";
import Product from "../src/Product";
import Order from "../src/Order";

test("Order - Invalid CPF", function () {
    expect(() => new Order("111.111.111-11")).toThrow(new Error("Invalid cpf"));
});

test("Order - Create", function () {
    const order = new Order("847.903.332-05");
    expect(order).toBeDefined();
});

test("Order - 3 Items", function () {
    const order = new Order("847.903.332-05");
    order.addItem(new Product(1, 1, "Guitarra", 1000), 1);
    order.addItem(new Product(2, 1, "Amplificador", 5000), 1);
    order.addItem(new Product(3, 1, "Cabo", 30), 3);
    const total = order.getTotal();
    expect(total).toBe(6090);
});

test("Order - 3 Items with Coupon", function () {
    const order = new Order("847.903.332-05");
    order.addItem(new Product(1, 1, "Guitarra", 1000), 1);
    order.addItem(new Product(2, 1, "Amplificador", 5000), 1);
    order.addItem(new Product(3, 1, "Cabo", 30), 3);
    order.addCoupon(new Coupon("VALE20", 20));
    const total = order.getTotal();
    expect(total).toBe(4872);
});
