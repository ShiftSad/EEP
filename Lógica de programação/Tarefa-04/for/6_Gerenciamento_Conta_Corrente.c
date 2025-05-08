#include <stdio.h>

int main() {
    float initial = 0;
    float initialCopy = 0;

    printf("Qual o valor inicial? ");
    scanf("%f", &initial);
    initialCopy = initial;

    for (int i = 0; i <= 5; i++) {
        char transaction;
        float amount;
        printf("Qual o tipo de transação? (D para depósito ou S para saque): ");
        scanf(" %c", &transaction);
        printf("Qual o valor da transação? ");
        scanf("%f", &amount);

        if (transaction == 'D' || transaction == 'd') {
            initial += amount;
        } else if (transaction == 'S' || transaction == 's') {
            initial -= amount;
        } else {
            printf("Transação inválida. Tente novamente.\n");
            i--;
        }
    }

    printf("Saldo inicial: %.2f\n", initialCopy);
    printf("Saldo final: %.2f\n", initial);
}