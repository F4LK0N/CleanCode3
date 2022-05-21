export default class Body
{
    width: number;  //cm
    height: number; //cm
    length: number; //cm
    volume: number; //cm3
    weight: number; //gm
    density: number;//gm/cm3



    constructor (width: number = 1, height: number = 1, length: number = 1, weight:number = 1) {
        this.width  = Math.max(1, width);
        this.height = Math.max(1, height);
        this.length = Math.max(1, length);
        this.weight = Math.max(1, weight);
        this.calculateVolume();
        this.calculateDensity();
    }

    calculateVolume(){
        this.volume = this.width * this.height * this.length;
    }

    calculateDensity(){
        this.density = Math.round(this.weight / this.volume * 100) / 100;
    }

}
