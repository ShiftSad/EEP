#include <stdio.h>

float add(const float a, const float b) { return a + b; }
float sub(const float a, const float b) { return a - b; }
float div(const float a, const float b) { return b == 0 ? 0 : a / b; }
float mul(const float a, const float b) { return a * b; }

typedef float (*operator)(float a, float b);

typedef struct {
    char symbol;
    operator func;
} Operator;

Operator ops[] = {
    {'+', add},
    {'-', sub},
    {'*', mul},
    {'/', div}
};

operator get_func(const char operator) {
    for (int i = 0; i < 4; i++) {
        if (ops[i].symbol == operator) return ops[i].func;
    }

    return NULL;
}

int main() {
    printf("Type operation!\n");
    float a, b;
    char op;

    scanf("%f %c %f", &a, &op, &b);
    const operator func = get_func(op);
    if (func) printf("Result: %f\n", func(a, b));
    else printf("Operator not found!");
}