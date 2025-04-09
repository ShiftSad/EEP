#include <stdio.h>

int main() {
    float preco, novoPreco;
    char classificacao[20];

    printf("Digite o preco do produto: ");
    scanf("%f", &preco);

    // Aumento de preço
    if (preco <= 50) {
        novoPreco = preco * 1.05; // Aumenta 5%
    } else if (preco <= 100) {
        novoPreco = preco * 1.10; // Aumenta 10%
    } else {
        novoPreco = preco * 1.15; // Aumenta 15%
    }

    // Classificação
    if (novoPreco <= 80) {
        sprintf(classificacao, "Barato");
    } else if (novoPreco <= 120) {
        sprintf(classificacao, "Normal");
    } else if (novoPreco <= 200) {
        sprintf(classificacao, "Caro");
    } else {
        sprintf(classificacao, "Muito caro");
    }

    printf("Novo preco: %.2f\n", novoPreco);
    printf("Classificacao: %s\n", classificacao);
}