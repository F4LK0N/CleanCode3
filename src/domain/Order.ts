import Coupon from "./Coupon";
import Cpf from "./Cpf";
import Product from "./Product";
import OrderItem from "./OrderItem";

export default class Order
{
    cpf: Cpf;
    coupon: Coupon | undefined;
    orderItems: OrderItem[];

    freightDistance:number = 1000;
    FREIGHT_MINIMUM = 1000;



    constructor (cpf: string) {
        this.cpf = new Cpf(cpf);
        this.orderItems = [];
    }

    addItem(quantity: number, product: Product) {
        const orderItem = new OrderItem(this.orderItems.length+1, quantity, product);
        this.orderItems.push(orderItem);
    }

    addCoupon (coupon: Coupon, orderDate: Date = new Date()) {
        if(coupon.expired(orderDate)){
            throw new Error("Expired Coupon");
        }
        this.coupon = coupon;
    }

    getPrice() {
        let price = 0;
        for (const orderItem of this.orderItems) {
            price += orderItem.price;
        }
        if (this.coupon) {
            price -= ((price * this.coupon.percentage) / 100);
        }
        return Math.max(0, price);
    }

    getFreight() {
        let freight = 0;
        for (const orderItem of this.orderItems) {
            freight += (this.freightDistance * orderItem.volume * (orderItem.density / 100));
        }
        return Math.max(this.FREIGHT_MINIMUM, freight);
    }

    getTotal() {
        return this.getPrice() + this.getFreight();
    }

}