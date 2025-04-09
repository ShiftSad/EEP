#include <stdio.h>

int main() {
    int codigo, quantidade;
    float preco, total, desconto, totalComDesconto;

    printf("Digite o codigo do produto (1 a 40): ");
    scanf("%d", &codigo);

    if (codigo < 1 || codigo > 40) {
        printf("Codigo invalido.\n");
        return 1;
    }

    printf("Digite a quantidade: ");
    scanf("%d", &quantidade);

    // Definindo o preco com base no codigo
    if (codigo >= 1 && codigo <= 10) {
        preco = 10.0;
    } else if (codigo >= 11 && codigo <= 20) {
        preco = 15.0;
    } else if (codigo >= 21 && codigo <= 30) {
        preco = 20.0;
    } else if (codigo >= 31 && codigo <= 40) {
        preco = 30.0;
    }

    total = preco * quantidade;

    // Calculando o desconto
    if (total <= 250) {
        desconto = total * 0.05; // 5%
    } else if (total > 250 && total <= 500) {
        desconto = total * 0.10; // 10%
    } else {
        desconto = total * 0.15; // 15%
    }

    totalComDesconto = total - desconto;

    printf("Preco unitario: %.2f\n", preco);
    printf("Preco total: %.2f\n", total);
    printf("Desconto: %.2f\n", desconto);
    printf("Total com desconto: %.2f\n", totalComDesconto);
}
