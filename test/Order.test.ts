import Coupon from "../src/Coupon";
import Product from "../src/Product";
import Order from "../src/Order";
import Body from "../src/Body";

test("Order - Invalid CPF", function () {
    expect(() => new Order("111.111.111-11")).toThrow(new Error("Invalid cpf"));
});

test("Order - Create", function () {
    const order = new Order("847.903.332-05");
    expect(order).toBeDefined();
});

test("Order - 1 Item Default", function () {
    const body = new Body(10, 10, 10, 1000);
    const product1 = new Product(1, 1, "Product", 1000, body);
    const order = new Order("847.903.332-05");
    order.addItem(1, product1);

    expect(order.getPrice()).toBe(1000);
    expect(order.getFreight()).toBe(10000);
    expect(order.getTotal()).toBe(11000);
});

test("Order - 3 Items", function () {
    const product1 = new Product(1050, 1, "Guitarra", 250000);
    const product2 = new Product(1602, 1, "Amplificador", 30000);
    const product3 = new Product(7052, 1, "Cabo", 2000);
    const order = new Order("847.903.332-05");
    order.addItem(1, product1);
    order.addItem(1, product2);
    order.addItem(3, product3);

    expect(order.getPrice()).toBe(282000);
});

// test("Order - 3 Items with Coupon", function () {
//     const order = new Order("847.903.332-05");
//     order.addItem(new Product(1, 1, "Guitarra", 1000), 1);
//     order.addItem(new Product(2, 1, "Amplificador", 5000), 1);
//     order.addItem(new Product(3, 1, "Cabo", 30), 3);
//     order.addCoupon(new Coupon("VALE20", 20));
//     const total = order.getTotal();
//     expect(total).toBe(4872);
// });
//
// test("Order - Freight", function(){
//    const order = new Order("847.903.332-05");
//     order.addItem(new Product(1, 1, "Guitarra", 1000), 1);
// });
