#include <stdio.h>

int main() {
    int i, codigo, codigoMaisGordo, codigoMaisMagro;
    float peso, pesoTotal = 0;
    float maiorPeso = 0, menorPeso = 100000;

    for (i = 1; i <= 7; i++) {
        printf("Digite o código do boi %d: ", i);
        scanf("%d", &codigo);

        printf("Digite o peso do boi %d (em kg): ", i);
        scanf("%f", &peso);

        pesoTotal += peso;

        if (peso > maiorPeso) {
            maiorPeso = peso;
            codigoMaisGordo = codigo;
        }

        if (peso < menorPeso) {
            menorPeso = peso;
            codigoMaisMagro = codigo;
        }
    }

    printf("\nO boi mais gordo tem código %d e pesa %f kg.\n", codigoMaisGordo, maiorPeso);
    printf("O boi mais magro tem código %d e pesa %f kg.\n", codigoMaisMagro, menorPeso);
    printf("O peso médio de todos os bois é %f kg.\n", pesoTotal / 7);
}
