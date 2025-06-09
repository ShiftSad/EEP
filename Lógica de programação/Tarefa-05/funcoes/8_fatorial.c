#include <stdio.h>

void calcular_e_mostrar_fatorial_de_numero(int n) {
    if (n < 0) {
        printf("Fatorial nao definido para negativos\n");
        return;
    }
    long long fatorial = 1;
    for (int i = 1; i <= n; i++) {
        fatorial *= i;
    }
    printf("%lld\n", fatorial);
}

int main() {
    int num;
    scanf("%d", &num);
    calcular_e_mostrar_fatorial_de_numero(num);
    return 0;
}
