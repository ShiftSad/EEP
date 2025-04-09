#include <stdio.h>

void main() {
    float a, b, maior;

    printf("Digite dois numeros:\n");
    printf("Numero 1: ");
    scanf("%f", &a);
    printf("Numero 2: ");
    scanf("%f", &b);

    if (a > b) {
        maior = a;
    } else {
        maior = b;
    }

    printf("O maior numero e: %.2f\n", maior);
}