#include <stdio.h>

double calcular_media_de_valores_positivos() {
    double soma = 0.0;
    int contador = 0;
    double valor;
    scanf("%lf", &valor);
    while (valor != 0) {
        if (valor > 0) {
            soma += valor;
            contador++;
        }
        scanf("%lf", &valor);
    }
    if (contador == 0) return 0.0;
    return soma / contador;
}

int main() {
    printf("%.2f\n", calcular_media_de_valores_positivos());
    return 0;
}
