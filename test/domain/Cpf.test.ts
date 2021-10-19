import Cpf from "../../src/domain/Cpf"

test("CPF - Valid", function () {
    const cpf = new Cpf("847.903.332-05");
    expect(cpf.value).toBe("847.903.332-05");
});

test("CPF - Invalid", function () {
    expect(() => new Cpf("111.111.111-11")).toThrow(new Error("Invalid cpf"));
});
