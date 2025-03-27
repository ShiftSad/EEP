#include <stdio.h>

int main() {
    float first;
    float second;

    printf("Digite o primeiro número: ");
    scanf("%f", &first);
    printf("Digite o segundo número: ");
    scanf("%f", &second);

    printf("Divisão: %.2f\n", first / second);
}