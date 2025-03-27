#include <stdio.h>

int main() {
    float money;
    printf("Digite o valor em reais: ");
    scanf("%f", &money);

    printf("Dolar: %.2f\n", money / 1.8);
    printf("Marco alemão: %.2f\n", money / 2);
    printf("Libra esterlina: %.2f\n", money / 3.57);
}