/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   window.c                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/29 13:27:33 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/12 17:34:57 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

int     ft_create_window(t_all *all)
{
	int		x;
	int		y;
	double	ex;
	int		ey;
	int		win;

	win = 1000;
	y = 0;
	ex = 5 * 1.732;
	ey = 5;
	all->win.mlx_ptr = mlx_init();
	all->win.win_ptr = mlx_new_window(all->win.mlx_ptr, win, win, "fdf");
	while (y < all->map.height)
	{
		x = 0;
		while (x < all->map.width)
		{
			all->bres.xi = ((x - y) + (all->map.height / 2 - all->map.width / 2)) * ex + (win / 2);
			all->bres.yi = ((x + y) - (all->map.height / 2 + all->map.width / 2)) * ey + (win / 2) - all->map.tab[y][x];
			if (x < all->map.width - 1)
			{
				all->bres.xf = (((x + 1) - y) + (all->map.height / 2 - all->map.width / 2)) * ex + 500;
				all->bres.yf = (((x + 1) + y) - (all->map.height / 2 + all->map.width / 2)) * ey + 500 - all->map.tab[y][x + 1];
				ft_bresenham(all);
			}
			if (y < all->map.height - 1)
			{
				all->bres.xf = ((x - (y + 1)) + (all->map.height / 2 - all->map.width / 2)) * ex + 500;
				all->bres.yf = ((x + (y + 1)) - (all->map.height / 2 + all->map.width / 2)) * ey + 500 - all->map.tab[y + 1][x];
				ft_bresenham(all);
			}
			x++;
		}
		y++;
	}
	mlx_loop(all->win.mlx_ptr);
    return (0);
}