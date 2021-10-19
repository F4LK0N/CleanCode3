export default class Body
{
    width: number;  //cm
    height: number; //cm
    length: number; //cm
    volume: number; //cm3

    constructor (width: number = 1, height: number = 1, length: number = 1) {
        this.width  = Math.max(1, width);
        this.height = Math.max(1, height);
        this.length = Math.max(1, length);
        this.calculateVolume();
    }

    calculateVolume(){
        this.volume = this.width * this.height * this.length;
    }
}
