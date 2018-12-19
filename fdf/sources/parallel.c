/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   parallel.c                                         :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/12/18 16:59:22 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/19 17:58:19 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

void	ft_para(t_all *all)
{
	int		y;
	int		x;
	int		z;

	z = 0;
	all->win.ey *= 2;
	y = 0;
	while (y < all->map.height)
	{
		x = 0;
		while (x < all->map.width)
		{
			ft_para1(all, x, y, z);
			x++;
		}
		y++;
	}
	all->win.ey /= 2;
}

void	ft_para1(t_all *all, int x, int y, int z)
{
	all->bres.xi = (x - y) * all->win.ex + all->win.rl;
	all->bres.yi = (y) * all->win.ey + all->win.ud
		- all->win.ez * all->map.tab[y][x];
	if (y < all->map.height - 1)
	{
		all->bres.xf = (x - y - 1) * all->win.ex + all->win.rl;
		all->bres.yf = (y + 1) * all->win.ey + all->win.ud
			- all->win.ez * all->map.tab[y + 1][x];
		ft_bresenham(all, z);
	}
	if (x < all->map.width - 1)
	{
		all->bres.xf = (x + 1 - y) * all->win.ex + all->win.rl;
		all->bres.yf = (y) * all->win.ey + all->win.ud
			- all->win.ez * all->map.tab[y][x + 1];
		ft_bresenham(all, z);
	}
}