import Body from "../src/Body"

test("Body - Sanitize Inputs", function () {
    const body = new Body(-1, -1, -1);
    expect(body.width).toBe(1);
    expect(body.height).toBe(1);
    expect(body.length).toBe(1);
});

test("Body - Default", function () {
    const body = new Body();
    expect(body.volume).toBe(1);
    expect(body.density).toBe(1);
});

test("Body - Calculate Volume", function () {
    const body = new Body(10, 15, 12, 500);
    expect(body.volume).toBe(1800);
    expect(body.density).toBe(0.28);
});
