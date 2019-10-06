# -*- coding: utf-8 -*-
"""
Created on Sat Oct 05 19:51:36 2019

@author: USER
"""

import numpy as np
import skfuzzy as fuzzy
import matplotlib.pyplot as plot

valueVonis = 50;
valuePendidikan = 0;
valueUmur = 20;

x_vonis = np.arange(0, 111, 1);
x_pendidikan = np.arange(0, 3, 1);
x_umur = np.arange(18, 111, 1);
x_paket = np.arange(0, 3, 1);

vonis_ringan = fuzzy.trimf(x_vonis, [0, 0, 10]);
vonis_sedang = fuzzy.trimf(x_vonis, [8, 11, 30]);
vonis_berat = fuzzy.trimf(x_vonis, [20, 110, 110]);

pendidikan_smp = fuzzy.trimf(x_pendidikan, [0, 0, 0]);
pendidikan_sma = fuzzy.trimf(x_pendidikan, [1, 1, 1]);
pendidikan_s1 = fuzzy.trimf(x_pendidikan, [2, 2, 3]);

umur_muda = fuzzy.trimf(x_umur, [18, 18, 30]);
umur_sedang = fuzzy.trimf(x_umur, [30, 37, 45]);
umur_tua = fuzzy.trimf(x_umur, [45, 110, 110]);

paket_paket1 = fuzzy.trimf(x_paket, [0, 0, 0]);
paket_paket2 = fuzzy.trimf(x_paket, [1, 1, 1]);
paket_paket3 = fuzzy.trimf(x_paket, [2, 2, 2]);

fig, (ax0, ax1, ax2, ax3) = plot.subplots(nrows=4, figsize=(8, 12))

ax0.plot(x_vonis, vonis_ringan, 'b', linewidth=1.5, label='Ringan')
ax0.plot(x_vonis, vonis_sedang, 'g', linewidth=1.5, label='Sedang')
ax0.plot(x_vonis, vonis_berat, 'r', linewidth=1.5, label='Berat')
ax0.set_title('Vonis')
ax0.legend()

ax1.plot(x_pendidikan, pendidikan_smp, 'b', linewidth=1.5, label='SMP')
ax1.plot(x_pendidikan, pendidikan_sma, 'g', linewidth=1.5, label='SMA')
ax1.plot(x_pendidikan, pendidikan_s1, 'r', linewidth=1.5, label='S1')
ax1.set_title('Pendidikan')
ax1.legend()

ax2.plot(x_umur, umur_muda, 'b', linewidth=1.5, label='Muda')
ax2.plot(x_umur, umur_sedang, 'g', linewidth=1.5, label='Sedang')
ax2.plot(x_umur, umur_tua, 'r', linewidth=1.5, label='Tua')
ax2.set_title('Umur')
ax2.legend()

ax3.plot(x_paket, paket_paket1, 'b', linewidth=1.5, label='Paket 1')
ax3.plot(x_paket, paket_paket2, 'g', linewidth=1.5, label='Paket 2')
ax3.plot(x_paket, paket_paket3, 'r', linewidth=1.5, label='Paket 3')
ax3.set_title('Paket')
ax3.legend()

for ax in (ax0, ax1, ax2, ax3):
    ax.spines['top'].set_visible(False)
    ax.spines['right'].set_visible(False)
    ax.get_xaxis().tick_bottom()
    ax.get_yaxis().tick_left()

plot.tight_layout()


MF_vonis_ringan = fuzzy.interp_membership(x_vonis, vonis_ringan, valueVonis);
MF_vonis_sedang = fuzzy.interp_membership(x_vonis, vonis_sedang, valueVonis);
MF_vonis_berat = fuzzy.interp_membership(x_vonis, vonis_berat, valueVonis);

MF_pendidikan_smp = fuzzy.interp_membership(x_pendidikan, pendidikan_smp, valuePendidikan);
MF_pendidikan_sma = fuzzy.interp_membership(x_pendidikan, pendidikan_sma, valuePendidikan);
MF_pendidikan_s1 = fuzzy.interp_membership(x_pendidikan, pendidikan_s1, valuePendidikan);

MF_umur_muda = fuzzy.interp_membership(x_umur, umur_muda, valueUmur);
MF_umur_sedang = fuzzy.interp_membership(x_umur, umur_sedang, valueUmur);
MF_umur_tua = fuzzy.interp_membership(x_umur, umur_tua, valueUmur);

active_rule1 = np.amin([MF_vonis_ringan, MF_pendidikan_smp, MF_umur_muda]);
active_rule2 = np.amin([MF_vonis_ringan, MF_pendidikan_smp, MF_umur_sedang]);
active_rule3 = np.amin([MF_vonis_sedang, MF_pendidikan_smp, MF_umur_sedang]);
active_rule4 = np.amin([MF_vonis_sedang, MF_pendidikan_smp, MF_umur_tua]);
active_rule5 = np.amin([MF_vonis_berat, MF_pendidikan_smp, MF_umur_muda]);
active_rule6 = np.amin([MF_vonis_berat, MF_pendidikan_smp, MF_umur_sedang]);
# =============================================================================
# 1 1 1, 1 (1) : 1
# 1 1 2, 1 (1) : 1
# 2 1 2, 2 (1) : 1
# 2 1 3, 2 (1) : 1
# 3 1 1, 2 (1) : 1
# 3 1 2, 3 (1) : 1
# =============================================================================

implikasiRule1_Paket1 = np.fmin(active_rule1, paket_paket1)
implikasiRule2_Paket1 = np.fmin(active_rule2, paket_paket1)
implikasiRule3_Paket2 = np.fmin(active_rule3, paket_paket2)
implikasiRule4_Paket2 = np.fmin(active_rule4, paket_paket2)
implikasiRule5_Paket3 = np.fmin(active_rule5, paket_paket3)
implikasiRule6_Paket3 = np.fmin(active_rule6, paket_paket3)

paket0 = np.zeros_like(x_paket)

# =============================================================================
# # Visualize this
# fig, ax0 = plot.subplots(figsize=(8, 4))
# 
# ax0.fill_between(x_paket, paket0, implikasiRule1_Paket1, facecolor='b', alpha=0.7)
# ax0.plot(x_paket, paket_paket1, 'b', linewidth=0.5, linestyle='--', )
# ax0.fill_between(x_paket, paket0, implikasiRule3_Paket2, facecolor='g', alpha=0.7)
# ax0.plot(x_paket, paket_paket2, 'g', linewidth=0.5, linestyle='--')
# ax0.fill_between(x_paket, paket0, implikasiRule5_Paket3, facecolor='r', alpha=0.7)
# ax0.plot(x_paket, paket_paket3, 'r', linewidth=0.5, linestyle='--')
# ax0.set_title('Output membership activity')
# 
# # Turn off top/right axes
# for ax in (ax0,):
#     ax.spines['top'].set_visible(False)
#     ax.spines['right'].set_visible(False)
#     ax.get_xaxis().tick_bottom()
#     ax.get_yaxis().tick_left()
# 
# plot.tight_layout()
# 
# =============================================================================

# Aggregate all three output membership functions together
aggregated = np.fmax(implikasiRule1_Paket1, 
                     np.fmax(implikasiRule2_Paket1, 
                             np.fmax(implikasiRule3_Paket2, 
                                     np.fmax(implikasiRule4_Paket2, 
                                             np.fmax(implikasiRule5_Paket3, implikasiRule6_Paket3)))))

paket = fuzzy.defuzz(x_paket, aggregated, 'centroid')
paket_activation = fuzzy.interp_membership(x_paket, aggregated, paket)  # for plot

# Visualize this
fig, ax0 = plot.subplots(figsize=(8, 3))

ax0.plot(x_paket, paket_paket1, 'b', linewidth=0.5, linestyle='--', )
ax0.plot(x_paket, paket_paket2, 'g', linewidth=0.5, linestyle='--')
ax0.plot(x_paket, paket_paket3, 'r', linewidth=0.5, linestyle='--')
ax0.fill_between(x_paket, paket0, aggregated, facecolor='Orange', alpha=0.7)
ax0.plot([paket, paket], [0, paket_activation], 'k', linewidth=1.5, alpha=0.9)
ax0.set_title('Aggregated membership and result (line)')

# Turn off top/right axes
for ax in (ax0,):
    ax.spines['top'].set_visible(False)
    ax.spines['right'].set_visible(False)
    ax.get_xaxis().tick_bottom()
    ax.get_yaxis().tick_left()

plot.tight_layout()




