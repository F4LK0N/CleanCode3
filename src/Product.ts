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



    constructor (id: number, idCategory: number, name: string, price: number, width: number=0, height: number=0, length: number=0, weight: number=0)
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
