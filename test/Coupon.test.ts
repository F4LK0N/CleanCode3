import Coupon from "../src/Coupon";

test("Coupon - Sanitize Inputs", function () {
    let coupon;

    coupon = new Coupon("A", -1);
    expect(coupon.percentage).toBe(1);

    coupon = new Coupon("A", 200);
    expect(coupon.percentage).toBe(100);
});

test("Coupon - No expire date", function () {
    const coupon = new Coupon("ABC", 10);
    const result = coupon.expired();
    expect(result).toBeFalsy();
});

test("Coupon - Expired", function () {
    const coupon = new Coupon("ABC", 10, new Date('2020-12-20T01:00:00'));
    const result = coupon.expired(new Date('2020-12-20T01:00:01'));
    expect(result).toBeTruthy();
});

test("Coupon - Valid", function () {
    const coupon = new Coupon("ABC", 10, new Date('2020-12-20T01:00:00'));
    const result = coupon.expired(new Date('2020-12-20T01:00:00'));
    expect(result).toBeFalsy();
});
