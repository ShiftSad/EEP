#include <stdio.h>

int somar_de_um_a_n(int n_val) {
    int soma = 0;
    if (n_val > 0) {
        for (int i = 1; i <= n_val; i++) {
            soma += i;
        }
    }
    return soma;
}

int main() {
    int numero;
    scanf("%d", &numero);
    printf("%d\n", somar_de_um_a_n(numero));
    return 0;
}
