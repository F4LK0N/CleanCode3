export default class Coupon
{
    code: string;
    percentage: number;
    expireDate: Date;



    constructor (code: string, percentage: number, expires: Date = null) {
        this.code = code;
        this.percentage = Math.max(1, Math.min(100, percentage));
        this.expireDate = expires;
    }

    expired (date: Date = new Date()) {
        if (!this.expireDate){
            return false;
        }
        return this.expireDate.getTime() < date.getTime();
    }

}
