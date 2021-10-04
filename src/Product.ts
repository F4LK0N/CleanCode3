export default class Product
{
    id: number;
    idCategory: number;
    name: string;

    price: number;  //cents

    width: number;  //cm
    height: number; //cm
    length: number; //cm
    weight: number; //grams



    constructor (id: number, idCategory: number, name: string, price: number, width: number, height: number, length: number, weight: number)
    {
        this.id = id;
        this.idCategory = idCategory;
        this.name = name;
        this.price = price;
        this.width = width;
        this.height = height;
        this.length = length;
        this.weight = weight;
    }

}
