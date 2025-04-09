#include <stdio.h>

int main() {
    float valor, desconto, valorFinal;
    printf("Digite o valor do produto: ");
    scanf("%f", &valor);

    if (valor <= 30) {
        desconto = 0;
    } else if (valor > 30 && valor <= 100) {
        desconto = valor * 0.10;
    } else {
        desconto = valor * 0.15;
    }

    valorFinal = valor - desconto;
    printf("Valor final: %.2f\n", valorFinal);
}