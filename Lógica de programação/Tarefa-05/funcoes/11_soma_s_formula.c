#include <stdio.h>
#include <math.h>

double calcular_soma_s_formula(int n_termos) {
    double s = 0.0;
    for (int i = 1; i <= n_termos; i++) {
        s += (pow(i, 2) + 1.0) / (i + 3.0);
    }
    return s;
}

int main() {
    int n_val;
    scanf("%d", &n_val);
    if (n_val > 0) {
        double resultado = calcular_soma_s_formula(n_val);
        printf("%.2f\n", resultado);
    }
    return 0;
}
