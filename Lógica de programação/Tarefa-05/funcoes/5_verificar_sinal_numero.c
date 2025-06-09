#include <stdio.h>

int verificar_sinal_do_numero(int valor) {
    if (valor > 0) {
        return 1; // Positivo
    } else if (valor < 0) {
        return -1; // Negativo
    } else {
        return 0; // Zero
    }
}

int main() {
    int val;
    scanf("%d", &val);
    int sinal = verificar_sinal_do_numero(val);
    if (sinal == 1) {
        printf("Positivo\n");
    } else if (sinal == -1) {
        printf("Negativo\n");
    } else {
        printf("Zero\n");
    }
    return 0;
}
