import Body from "./Body";

export default class Product
{
    id: number;
    idCategory: number;
    name: string;
    price: number;  //cents
    body: Body;



    constructor (id: number, idCategory: number, name: string, price: number, body: Body = new Body())
    {
        this.id = id;
        this.idCategory = idCategory;
        this.name = name;
        this.price = Math.max(1, price);
        this.body = body;
    }

}
