#include <stdio.h>

int main() {
    float custoFabrica, precoConsumidor;

    printf("Digite o custo de fabrica do veiculo: ");
    scanf("%f", &custoFabrica);

    if (custoFabrica <= 12000) {
        precoConsumidor = custoFabrica + (custoFabrica * 0.05);
    } else if (custoFabrica <= 25000) {
        precoConsumidor = custoFabrica + (custoFabrica * 0.10) + (custoFabrica * 0.15);
    } else {
        precoConsumidor = custoFabrica + (custoFabrica * 0.15) + (custoFabrica * 0.20);
    }

    printf("O preco ao consumidor e: %.2f\n", precoConsumidor);
}