import Coupon from "../src/Coupon";
import Product from "../src/Product";
import Order from "../src/Order";

test("Não deve criar um pedido com CPF inválido", function () {
    expect(() => new Order("111.111.111-11")).toThrow(new Error("Invalid cpf"));
});

test("Deve criar um pedido", function () {
    const order = new Order("847.903.332-05");
    expect(order).toBeDefined();
});

test("Deve criar um pedido com 3 itens", function () {
    const order = new Order("847.903.332-05");
    order.addItem(new Product(1, 1, "Guitarra", 1000), 1);
    order.addItem(new Product(2, 1, "Amplificador", 5000), 1);
    order.addItem(new Product(3, 1, "Cabo", 30), 3);
    const total = order.getTotal();
    expect(total).toBe(6090);
});

test("Deve criar um pedido com 3 itens com cupom de desconto", function () {
    const order = new Order("847.903.332-05");
    order.addItem(new Product(1, 1, "Guitarra", 1000), 1);
    order.addItem(new Product(2, 1, "Amplificador", 5000), 1);
    order.addItem(new Product(3, 1, "Cabo", 30), 3);
    order.addCoupon(new Coupon("VALE20", 20));
    const total = order.getTotal();
    expect(total).toBe(4872);
});
