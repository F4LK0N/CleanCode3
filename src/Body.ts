export default class Body
{
    width: number;
    height: number;
    length: number;
    volume: number;

    constructor (width: number, height: number, length: number) {
        this.width  = Math.max(1, width);
        this.height = Math.max(1, height);
        this.length = Math.max(1, length);
        this.calculateVolume();
    }

    calculateVolume(){
        this.volume = this.width * this.height * this.length;
    }
}
