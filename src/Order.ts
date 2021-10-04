import Coupon from "./Coupon";
import Cpf from "./Cpf";
import Product from "./Product";
import OrderItem from "./OrderItem";

export default class Order {
    cpf: Cpf;
    coupon: Coupon | undefined;
    orderItems: OrderItem[];


    constructor (cpf: string) {
        this.cpf = new Cpf(cpf);
        this.orderItems = [];
    }

    addItem(item: Product, quantity: number) {
        this.orderItems.push(new OrderItem(item.id, item.price, quantity));
    }

    addCoupon (coupon: Coupon) {
        this.coupon = coupon;
    }

    getTotal() {
        let total = 0;
        for (const orderItem of this.orderItems) {
            total += orderItem.getTotal();
        }
        if (this.coupon) {
            total -= (total * this.coupon.percentage) / 100;
        }
        return total;
    }
}
