import Coupon from "../../src/domain/Coupon";
import Product from "../../src/domain/Product";
import Order from "../../src/domain/Order";
import Body from "../../src/domain/Body";
import Cpf from "../../src/domain/Cpf";

test("Order - Invalid CPF", function () {
    expect(() => new Order("111.111.111-11")).toThrow(new Error("Invalid cpf"));
});

test("Order - Create", function () {
    const order = new Order("847.903.332-05");
    expect(order).toBeDefined();
});

test("Order - Freight Minimum", function () {
    const body = new Body(1, 1, 1, 1);
    const product1 = new Product(1, 1, "Product", 1000, body);
    const order = new Order("847.903.332-05");
    order.addItem(1, product1);
    expect(order.getFreight()).toBe(1000);
});

test("Order - Freight", function () {
    const body = new Body(20, 20, 20, 1000);
    const product1 = new Product(1, 1, "Product", 1000, body);
    const order = new Order("847.903.332-05");
    order.addItem(1, product1);
    expect(order.getFreight()).toBe(10400);
});

test("Order - Price", function () {
    const product1 = new Product(1, 1, "Product", 1000);
    const product2 = new Product(1, 1, "Product", 1500);
    const product3 = new Product(1, 1, "Product", 9900);
    const order = new Order("847.903.332-05");

    order.addItem(2, product1);
    expect(order.getPrice()).toBe(2000);

    order.addItem(5, product2);
    expect(order.getPrice()).toBe(9500);

    order.addItem(100, product3);
    expect(order.getPrice()).toBe(999500);
});

test("Order - Coupon (No expires)", function () {
    const product1 = new Product(1, 1, "Product", 10000);
    const order = new Order("847.903.332-05");

    order.addItem(2, product1);

    order.addCoupon(new Coupon("PROMO10", 10));
    expect(order.getPrice()).toBe(18000);

    order.addCoupon(new Coupon("PROMO100", 100));
    expect(order.getPrice()).toBe(0);
});

test("Order - Coupon (Expired)", function () {
    const dateCoupon = new Date('2020-12-20T01:00:00');
    const dateOrder = new Date('2020-12-20T01:00:10');
    const product1 = new Product(1, 1, "Product", 10000);
    const order = new Order("847.903.332-05");
    const coupon = new Coupon("PROMO10", 10, dateCoupon);

    order.addItem(2, product1);

    expect(() => order.addCoupon(coupon, dateOrder)).toThrow(new Error("Expired Coupon"));
    expect(order.coupon).toBeUndefined();
});

test("Order - Coupon (Valid)", function () {
    const dateCoupon = new Date('2020-12-20T01:00:10');
    const dateOrder = new Date('2020-12-20T01:00:00');
    const product1 = new Product(1, 1, "Product", 10000);
    const order = new Order("847.903.332-05");
    const coupon = new Coupon("PROMO10", 10, dateCoupon);

    order.addItem(2, product1);
    order.addCoupon(coupon, dateOrder);

    expect(order.coupon).toBeDefined();
});

test("Order - Total", function () {
    const product1 = new Product(1, 1, "Product", 1000);
    const product2 = new Product(1, 1, "Product", 1500);
    const product3 = new Product(1, 1, "Product", 2000);
    const order = new Order("847.903.332-05");
    const coupon = new Coupon("PROMO10", 10);

    order.addItem(2, product1);
    order.addItem(2, product2);
    order.addItem(2, product3);
    order.addCoupon(coupon);

    expect(order.getPrice()).toBe(8100);
    expect(order.getFreight()).toBe(1000);
    expect(order.getTotal()).toBe(9100);
});

test("Order - 3 Items with Coupon", function () {
    const order = new Order("847.903.332-05");
    order.addItem(1, new Product(9812, 1, "Guitarra", 459000));
    order.addItem(1, new Product(4516, 1, "Amplificador", 80000));
    order.addItem(3, new Product(8501, 1, "Cabo", 3000));
    order.addCoupon(new Coupon("VALE20", 20));

    expect(order.getTotal()).toBe(439400);
});
