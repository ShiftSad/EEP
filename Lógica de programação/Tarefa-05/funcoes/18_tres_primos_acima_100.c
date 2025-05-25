#include <stdio.h>
#include <stdbool.h>

bool eh_primo(int num) {
    if (num <= 1) return false;
    for (int i = 2; i * i <= num; i++) {
        if (num % i == 0) return false;
    }
    return true;
}

void gerar_e_mostrar_primos_acima_100() {
    int contador_primos = 0;
    int numero_atual = 101;
    while (contador_primos < 3) {
        if (eh_primo(numero_atual)) {
            printf("%d\n", numero_atual);
            contador_primos++;
        }
        numero_atual++;
    }
}

int main() {
    gerar_e_mostrar_primos_acima_100();
    return 0;
}
