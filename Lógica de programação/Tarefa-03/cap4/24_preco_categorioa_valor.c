#include <stdio.h>

int main() {
    float preco, novoPreco, imposto;
    int categoria;
    char situacao;

    printf("Digite o preco do produto: ");
    scanf("%f", &preco);

    printf("Digite a categoria (1 - Limpeza, 2 - Alimentacao, 3 - Vestuario): ");
    scanf("%d", &categoria);

    printf("Digite a situacao (R - Refrigeracao, N - Nao Refrigeracao): ");
    scanf(" %c", &situacao); // Note o espaço antes de %c para ignorar o caractere de nova linha

    if (preco <= 25) {
        switch (categoria) {
            case 1:
                novoPreco = preco * 1.05; // 5% aumento
                break;
            case 2:
                novoPreco = preco * 1.08; // 8% aumento
                break;
            case 3:
                novoPreco = preco * 1.10; // 10% aumento
                break;
            default:
                printf("Categoria invalida.\n");
                return 1;
        }
    } else {
        switch (categoria) {
            case 1:
                novoPreco = preco * 1.12; // 12% aumento
                break;
            case 2:
                novoPreco = preco * 1.15; // 15% aumento
                break;
            case 3:
                novoPreco = preco * 1.18; // 18% aumento
                break;
            default:
                printf("Categoria invalida.\n");
                return 1;
        }
    }

    if (categoria == 2 && situacao == 'R') {
        imposto = novoPreco * 0.05; // 5% imposto
    } else {
        imposto = novoPreco * 0.08; // 8% imposto
    }

    novoPreco += imposto;

    printf("Novo preco: %.2f\n", novoPreco);

    if (novoPreco <= 50) {
        printf("Barato\n");
    } else if (novoPreco > 50 && novoPreco < 120) {
        printf("Normal\n");
    } else {
        printf("Caro\n");
    }
}