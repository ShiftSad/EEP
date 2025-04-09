#include <stdio.h>

void main() {
    float a, b, menor;

    printf("Digite dois numeros:\n");
    printf("Numero 1: ");
    scanf("%f", &a);
    printf("Numero 2: ");
    scanf("%f", &b);

    if (a < b) {
        menor = a;
    } else {
        menor = b;
    }

    printf("O menor numero e: %.2f\n", menor);
}