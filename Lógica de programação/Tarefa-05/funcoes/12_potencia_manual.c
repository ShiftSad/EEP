#include <stdio.h>

double calcular_potencia(double base, int expoente) {
    double resultado = 1.0;
    if (expoente == 0) return 1.0;
    int exp_abs = expoente > 0 ? expoente : -expoente;
    for (int i = 0; i < exp_abs; i++) {
        resultado *= base;
    }
    if (expoente < 0) return 1.0 / resultado;
    return resultado;
}

int main() {
    double x_val;
    int z_val;
    scanf("%lf %d", &x_val, &z_val);
    double resultado = calcular_potencia(x_val, z_val);
    printf("%.2f\n", resultado);
    return 0;
}
