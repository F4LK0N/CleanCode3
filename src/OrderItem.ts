export default class OrderItem
{
    id: number;
    quantity: number;
    priceUnit: number;   //cents
    priceTotal: number;  //cents

    constructor (id: number, price: number, quantity: number) {
        this.id = id;
        this.quantity = quantity;
        this.priceUnit = price;
        this.priceTotal = price * quantity;
    }

    getTotal () {
        return this.priceTotal;
    }

}
