import OrderItem from "../src/OrderItem";
import Body from "../src/Body";

test("OrderItem - Sanitize Inputs", function () {
    const orderItem = new OrderItem(1, -1, -1);
    expect(orderItem.quantity).toBe(1);
    expect(orderItem.price).toBe(1);
});

test("OrderItem - Create", function () {
    const orderItem = new OrderItem(1, 1000, 2);
    expect(orderItem.getTotal()).toBe(2000);
});

test("OrderItem - Create with Body", function () {
    const orderItem = new OrderItem(1, 1000, 3, new Body(10, 11, 20));
    expect(orderItem.getTotal()).toBe(3000);
    expect(orderItem.getVolume()).toBe(6600);
});
