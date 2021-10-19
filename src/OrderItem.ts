import Body from "./Body";

export default class OrderItem
{
    id: number;
    quantity: number;
    price: number;   //cents
    body: Body;

    constructor (id: number, price: number, quantity: number, body: Body = new Body()) {
        this.id = id;
        this.price = Math.max(1, price);
        this.quantity = Math.max(1, quantity);
        this.body = body;
    }

    getTotal () {
        return this.price * this.quantity;
    }

    getVolume(){
        return this.body.volume * this.quantity;
    }

}
